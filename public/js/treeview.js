$.fn.extend({
    treed: function (o) {

        var tree = $(this);
        tree.addClass('tree');
        tree.find('li').has('ul').each(function () {
            var branch = $(this);
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
    }
});

$('#tree_struct').treed();

function rozwin() {
    $('#tree_struct').treed();
}

$(document).ready(function() {
    $('#mySelect').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#addNewNode')
    });

    $('#mySelect1').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#deleteNode')
    });

    $('#mySelect2').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#updateNode')
    });

    $('#mySelect3').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#moveNode')
    });

    $('#mySelect4').select2({
        theme: 'bootstrap-5',
        dropdownParent: $('#moveNode')
    });
});