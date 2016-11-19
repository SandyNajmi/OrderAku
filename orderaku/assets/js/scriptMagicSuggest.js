$(function() {

    var ms = $('#skill').magicSuggest({
        data: 'skills',
        valueField: 'skill_name',
        displayField: 'skill_name',
        mode: 'remote',
        renderer: function(data){
            return '<div class="country">' +
                    '<div class="name">' + data.skill_name + '</div>' +
                    '<div style="clear:both;"></div>' +
                '</div>';
        },
        resultAsString: true,
        selectionRenderer: function(data){
            return '<div class="name">' + data.skill_name + '</div>';
        }
    });


});
