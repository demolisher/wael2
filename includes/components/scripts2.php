<!-- 2  -->
<script>
  $(document).ready(function() {
    $("#container2 .row").each(function() {
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
    $('.lecNum2').on('change', function() {
      sum = 0;
      $('.lecNum2').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_lecNum2').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum2').on('change', function() {
      max = -Infinity;
      $('.clsNum2').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });

      $('#total_clsNum2').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum2').add('.clsNum2').on('change', function() {
      sum = 0;
      $('.tot2').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot2').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum2').add('.clsNum2').on('change', function() {
      sum = 0;
      $('.need2').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_need2').val(sum);
    });
  });
</script>

<!-- 3  -->

<script>
  $(document).ready(function() {
    $("#container3 .row").each(function() {
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
    $('.lecNum3').on('change', function() {
      sum = 0;
      $('.lecNum3').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_lecNum3').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum3').on('change', function() {
      max = -Infinity;
      $('.clsNum3').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });

      $('#total_clsNum3').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum3').add('.clsNum3').on('change', function() {
      sum = 0;
      $('.tot3').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot3').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum3').add('.clsNum3').on('change', function() {
      sum = 0;
      $('.need3').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_need3').val(sum);
    });
  });
</script>

<!-- 4  -->

<script>
  $(document).ready(function() {
    $("#container4 .row").each(function() {
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
    $('.lecNum4').on('change', function() {
      sum = 0;
      $('.lecNum4').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_lecNum4').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum4').on('change', function() {
      max = -Infinity;
      $('.clsNum4').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });

      $('#total_clsNum4').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum4').add('.clsNum4').on('change', function() {
      sum = 0;
      $('.tot4').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot4').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum4').add('.clsNum4').on('change', function() {
      sum = 0;
      $('.need4').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_need4').val(sum);
    });
  });
</script>

<!-- 5  -->

<script>
  $(document).ready(function() {
    $("#container5 .row").each(function() {
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
    $('.lecNum5').on('change', function() {
      sum = 0;
      $('.lecNum5').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });

      $('#total_lecNum5').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum5').on('change', function() {
      max = -Infinity;
      $('.clsNum5').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });

      $('#total_clsNum5').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum5').add('.clsNum5').on('change', function() {
      sum = 0;
      $('.tot5').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot5').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum5').add('.clsNum5').on('change', function() {
      sum = 0;
      $('.need5').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_need5').val(sum);
    });
  });
</script>

<!-- 6  -->

<script>
  $(document).ready(function() {
    $("#container6 .row").each(function() {
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
    $('.lecNum6').on('change', function() {
      sum = 0;
      $('.lecNum6').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_lecNum6').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var max = -Infinity;

    $('.clsNum6').on('change', function() {
      max = -Infinity;
      $('.clsNum6').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          max = Math.max(max, value);
        }
      });
      $('#total_clsNum6').val(max);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum6').add('.clsNum6').on('change', function() {
      sum = 0;
      $('.tot6').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_tot6').val(sum);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var sum = 0;
    $('.lecNum6').add('.clsNum6').on('change', function() {
      sum = 0;
      $('.need6').each(function() {
        var value = parseFloat($(this).val());
        if (!isNaN(value)) {
          sum += value;
        }
      });
      $('#total_need6').val(sum);
    });
  });
</script>