var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

function onSubmit(e) {
    if (confirm("Deseja sair?")) {
        return true;
    }
    e.preventDefault();
    return false;
}
