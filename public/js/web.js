var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

var toastElList = [].slice.call(document.querySelectorAll(".toast"));
var toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, {});
});

function showToast(item) {
    item.show();
}
toastList.forEach(showToast);

function onSubmit(e) {
    if (confirm("Deseja sair?")) {
        return true;
    }
    e.preventDefault();
    return false;
}
