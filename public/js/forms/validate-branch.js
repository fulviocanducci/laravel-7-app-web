$("#form1").validate({
    rules: {
        name: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "Digite a descrição da filial",
        },
    },
});
