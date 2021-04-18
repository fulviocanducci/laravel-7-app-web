//https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
function maskDate(element) {
    $(element).mask("00/00/0000");
}

function maskTime(element) {
    $(element).mask("00:00:00");
}

function maskDateTime(element) {
    $(element).mask("00/00/0000 00:00:00");
}

function maskCep(element) {
    $(element).mask("00000-000");
}
