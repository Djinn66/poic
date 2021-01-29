/**
 *
 *
 */

$(document).ready(function () {
    $('#personnel_email')
        .wrap('<div class="input-group"></div>')
        .after('<div class=" input-group-append"><span class="input-group-text">@intradef.gouv.fr</span></div>');

    let armee_select = $('#personnel_armee');

    if (armee_select.val() != "1") {
        $('#personnel_nia').parent().hide();
    } else $('#personnel_nia').parent().show();

    armee_select
        .on('change', () => {
            let grades;
            $('#personnel_grade option').remove();
            if (armee_select.val() != "") {
                $('#personnel_grade').append("<option value=>Grade...</option>")
                $.getJSON("/api/grade/" + armee_select.val(), (data) => {
                    grades = data[0]['grades'];
                    $.each(grades, (id, value) => {
                        $('#personnel_grade').append("<option value=" + value.id + ">" + value.intitule + "</option>")
                    });
                })
            } else $('#personnel_grade').append("<option value=>Sélectionnez une Armée...</option>");
            if (armee_select.val() != "1") {
                $('#personnel_nia').parent().hide();
            } else $('#personnel_nia').parent().show();

        });
});