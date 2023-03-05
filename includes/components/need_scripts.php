<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function() {
    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });

  $(function() {
    $('#countTask_Table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });

  $(function() {
    $('#teachers_Table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });

  $(function() {
    $('#students_Table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  $(document).on('submit', '#saveStudent', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("save_student", true);

    $.ajax({
      type: "POST",
      url: "n_code.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function(response) {

        var res = response;
        if (res.status == 422) {
          $('#errorMessage').removeClass('d-none');
          $('#errorMessage').text(res.message);
          alert(res.message);

        } else if (res.status == 200) {

          $('#errorMessage').addClass('d-none');
          $('#studentAddModal').modal('hide');
          $('#saveStudent')[0].reset();
          alert(res.message);

          alertify.set('notifier', 'position', 'top-right');
          alertify.success(res.message);

          $('#myTable').load(location.href + " #myTable");

        } else if (res.status == 302) {
          alert("هذا الاحتياج مسجل مسبقًا");
        }
        
        else if (res.status == 500) {
          alert(res.message);
        }
      }
    });

  });

  $(document).on('click', '.editStudentBtn', function() {

    var student_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "n_code.php?student_id=" + student_id,
      success: function(response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 404) {

          alert(res.message);
        } else if (res.status == 200) {

          $('#student_id').val(res.data.id);
          $('#compound').val(res.data.compound);
          $('#path').val(res.data.path);
          $('#level').val(res.data.level);
          $('#term').val(res.data.term);
          $('#gender').val(res.data.gender);
          $('#comple').val(res.data.comple);

          $('#studentEditModal').modal('show');
        }

      }
    });

  });

  $(document).on('submit', '#updateStudent', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("update_student", true);

    $.ajax({
      type: "POST",
      url: "n_code.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function(response) {

        var res = response;
        if (res.status == 422) {
          $('#errorMessageUpdate').removeClass('d-none');
          $('#errorMessageUpdate').text(res.message);

        } else if (res.status == 200) {

          $('#errorMessageUpdate').addClass('d-none');

          alertify.set('notifier', 'position', 'top-right');
          alertify.success(res.message);

          $('#studentEditModal').modal('hide');
          $('#updateStudent')[0].reset();
          alert(res.message);
          $('#myTable').load(location.href + " #myTable");

        } else if (res.status == 302) {
          alert("هذا الاحتياج مسجل مسبقًا");
        }
        else if (res.status == 500) {
          alert(res.message);
        }
      }
    });

  });

  $(document).on('click', '.viewStudentBtn', function() {

    var student_id = $(this).val();
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "code.php?student_id=" + student_id,
      success: function(response) {

        var res = response;
        if (res.status == 404) {

          alert(res.message);
        } else if (res.status == 200) {

          $('#view_name').text(res.data.name);
          $('#view_nationality').text(res.data.nationality);
          $('#view_speciality').text(res.data.speciality);
          $('#view_level').text(res.data.level);
          $('#view_term').text(res.data.term);
          $('#view_subject1').text(res.data.subject1);
          $('#view_clsNumber1').text(res.data.clsNumber1);
          $('#view_subject2').text(res.data.subject2);
          $('#view_clsNumber2').text(res.data.clsNumber2);
          $('#view_subject3').text(res.data.subject3);
          $('#view_clsNumber3').text(res.data.clsNumber3);
          $('#view_comple').text(res.data.comple);

          $('#studentViewModal').modal('show');
        }
      }
    });
  });

  $(document).on('click', '.deleteStudentBtn', function(e) {
    e.preventDefault();

    if (confirm('هل تريد حذف هذا الاحتياج؟ ')) {
      var student_id = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "n_code.php",
        data: {
          'delete_student': true,
          'student_id': student_id
        },
        success: function(response) {

          var res = response;
          if (res.status == 500) {

            alert(res.message);
          } else {
            alertify.set('notifier', 'position', 'top-right');
            alertify.success(res.message);
            alert("تم حذف الاحتياج بنجاح");
            $('#myTable').load(location.href + " #myTable");
          }
        }
      });
    }
  });
</script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<!-- <script src="dist/js/pages/dashboard.js"></script> -->