
    </div>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js"></script>
<script>
    $(document).ready(function($){
        $('.menu ul li a').filter(function() {
        var locationUrl = window.location.href;
        var currentItemUrl = $(this).prop('href');

        return currentItemUrl === locationUrl;
        }).parent('li').addClass('active');
    });
</script>
<script>
    const $tableID = $('#table'); const $BTN = $('#export-btn'); const $EXPORT = $('#export');
  const newTr = `
  <tr class="hide">
    <td class="pt-3-half" contenteditable="true">Example</td>
    <td class="pt-3-half" contenteditable="true">Example</td>
    <td class="pt-3-half" contenteditable="true">Example</td>
    <td class="pt-3-half" contenteditable="true">Example</td>
    <td class="pt-3-half" contenteditable="true">Example</td>
    <td class="pt-3-half">
      <span class="table-up"
        ><a href="#!" class="indigo-text"
          ><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a
      ></span>
      <span class="table-down"
        ><a href="#!" class="indigo-text"
          ><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a
      ></span>
    </td>
    <td>
      <span class="table-remove"
        ><button
          type="button"
          class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light"
        >
          Remove
        </button></span
      >
    </td>
  </tr>
  `;
  $('.table-add').on('click', 'i', () => {
    const $clone = $tableID.find('tbody
        tr ').last().clone(true).removeClass('
        hide table - line '); if ($tableID.find('
        tbody tr ').length ===
        0) {
        $('tbody').append(newTr);
    }
    $tableID.find('table').append($clone);
});
$tableID.on('click', '.table-remove', function() {
    $(this).parents('tr').detach();
});
$tableID.on('click', '.table-up', function() {
    const $row = $(this).parents('tr');
    if ($row.index() === 0) {
        return;
    }
    $row.prev().before($row.get(0));
});
$tableID.on('click',
    '.table-down',
    function() {
        const $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    }); // A few jQuery helpers for exporting only jQuery.fn.pop
= [].pop;
jQuery.fn.shift = [].shift;
$BTN.on('click', () => {
    const $rows =
        $tableID.find('tr:not(:hidden)');
    const headers = [];
    const data = []; // Get the headers
    (add special header logic here) $($rows.shift()).find('th:not(:empty)').each(function() {
        headers.push($(this).text().toLowerCase());
    }); // Turn all existing rows into a loopable
    array $rows.each(function() {
        const $td = $(this).find('td');
        const h = {}; // Use the
        headers from earlier to name our hash keys headers.forEach((header, i) => {
            h[header] =
                $td.eq(i).text();
        });
        data.push(h);
    }); // Output the result
    $EXPORT.text(JSON.stringify(data));
});
</script>
</body>
</html>