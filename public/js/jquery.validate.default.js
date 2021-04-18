const configuration = {
    errorElement: "span",
    errorClass: "is-invalid",
    errorPlacement: function (error, element) {
        error.addClass("text-danger");
        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }
    },
    success: function (label, element) {},
    highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
    },
};

$.validator.setDefaults(configuration);
