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
      url: "code.php",
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

        } else if (res.status == 500) {
          alert(res.message);
        }
      }
    });

  });

  $(document).on('click', '.editStudentBtn', function() {

    var student_id = $(this).val();

    $.ajax({
      type: "GET",
      url: "code.php?student_id=" + student_id,
      success: function(response) {

        var res = jQuery.parseJSON(response);
        if (res.status == 404) {

          alert(res.message);
        } else if (res.status == 200) {

          $('#student_id').val(res.data.id);
          $('#name').val(res.data.name);
          $('#nationality').val(res.data.nationality);
          $('#speciality').val(res.data.speciality);
          $('#level').val(res.data.level);
          $('#subject1').val(res.data.subject1);
          $('#clsNumber1').val(res.data.clsNumber1);
          $('#subject2').val(res.data.subject2);
          $('#clsNumber2').val(res.data.clsNumber2);
          $('#subject3').val(res.data.subject3);
          $('#clsNumber3').val(res.data.clsNumber3);

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
      url: "code.php",
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

        } else if (res.status == 500) {
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

    if (confirm('هل تريد حذف هذا المعلم؟ ')) {
      var student_id = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "code.php",
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

            $('#myTable').load(location.href + " #myTable");
          }
        }
      });
    }
  });

  $(document).on('click', '.deactive_t', function(e) {
    e.preventDefault();

    if (confirm('هل تريد تعطيل هذا المستخدم?')) {
      var student_id = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "code.php",
        data: {
          'deactivate_t': true,
          'student_id': student_id
        },
        success: function(response) {

          var res = response;
          if (res.status == 500) {

            alert(res.message);
          } else {
            alertify.set('notifier', 'position', 'top-right');
            alertify.success(res.message);

            $('#teachers_Table').load(location.href + " #teachers_Table");
          }
        }
      });
    }
  });

  $(document).on('click', '.activate_t', function(e) {
    e.preventDefault();

    if (confirm('هل تريد تفعيل هذا المستخدم?')) {
      var student_id = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "code.php",
        data: {
          'activate_t': true,
          'student_id': student_id
        },
        success: function(response) {

          var res = response;
          if (res.status == 500) {

            alert(res.message);
          } else {
            alertify.set('notifier', 'position', 'top-right');
            alertify.success(res.message);

            $('#teachers_Table').load(location.href + " #teachers_Table");
          }
        }
      });
    }
  });

  $(document).on('click', '.delete_t', function(e) {
    e.preventDefault();

    if (confirm('هل تريد حذف هذا المستخدم؟')) {
      var t_id = $(this).val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "code.php",
        data: {
          'delete_t': true,
          't_id': t_id
        },
        success: function(response) {

          var res = response;
          if (res.status == 500) {

            alert(res.message);
          } else {
            alertify.set('notifier', 'position', 'top-right');
            alertify.success(res.message);
            location.reload();
            $('#teachers_Table').load(location.href + " #teachers_Table");
          }
        }
      });
    }
  });

  $(document).on('submit', '#saveNeed', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("save_need", true);

    $.ajax({
      type: "POST",
      url: "code.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function(response) {

        var res = response;
        if (res.status == 422) {
          alert("حدث خطأ ما خلال إرسال البيانات");

        } else if (res.status == 200) {
          alert("تم تسجيل الاحتياج في قواعد البيانات! قم من فضلك بتوليد جدول المواد وإدخال الحقول المطلوبة لحساب الزيادة والعجز.");
          $('select[name="compound"]').prop('disabled', true);
          $('select[name="path"]').prop('disabled', true);
          $('select[name="level"]').prop('disabled', true);
          $('select[name="class"]').prop('disabled', true);
          $('select[name="gender"]').prop('disabled', true);
          $('select[name="subject[]"]').prop('disabled', true);
          $('input[name="comple"]').prop('disabled', true);
          $('input[name="needCode"]').prop('disabled', true);
          $('button[name="addNeed"]').css('display', 'none');
          $('#genSub').css('display', 'block');

        } else if (res.status == 500) {
          alert("لا يمكن الوصول إلى مخزن البيانات للأسف، يرجى التأكد من اتصالك بالشبكة.");
        }
      }
    });

  });
</script>
<script>
  $("#genSub").on("click", function() {
    var need_c = document.getElementById("needCode").value;
    window.location.href = "http://localhost/sort/need_subjects.php?c=" + need_c;

  });
</Script>

<script>
  $(document).ready(function() {
    $("#container1 .row").each(function() {
      var row = $(this).children();
      row.eq(1).add(row.eq(2)).on("change", function() {
        var secondChild = parseInt(row.eq(1).val());
        var thirdChild = parseInt(row.eq(2).val());
        var result = secondChild * thirdChild;
        row.eq(3).val(result);
        var resultDividedBy25 = result / $("#comple").val();
        row.eq(4).val(resultDividedBy25);
      });
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum1').on('change', function() {
      sum = 0;
      $('.lecNum1').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_lecNum1').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum1').on('change', function() {
      max = -Infinity;
      $('.clsNum1').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });

      $('#total_clsNum1').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum1').add('.clsNum1').on('change', function() {
      sum = 0;
      $('.tot1').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot1').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum1').add('.clsNum1').on('change', function() {
      sum = 0;
      $('.need1').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_need1').val(sum);
    });
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