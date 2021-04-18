jQuery.validator.addMethod(
    "dateBR",
    function (value, element) {
        return (
            this.optional(element) ||
            (value &&
                value.length === 10 &&
                moment(value, "DD/MM/YYYY").isValid())
        );
    },
    "Data inválida"
);
