$(document).ready(function () {
    $('.add-another-comment').click(function (e) {
        e.preventDefault();

        var listSelector = $(this).attr('data-list');
        var list = $(listSelector);

        var counter = list.data('widget-counter') || list.children().length;
        var newWidget = list.data('prototype');

        newWidget = newWidget.replace(/__name__/g, counter);
        counter++;
        list.data(' widget-counter', counter);

        var newElem = $(list.data('widget-tags')).html(newWidget);
        newElem.appendTo(list);
    });
});