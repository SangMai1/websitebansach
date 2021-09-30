var $form = $("form");
$form.validate({
  rules: {
    name: {
      required: true,
      minlength: 3,
    },
    quantity: {
      required: true,
    },
    price: {
      required: true
    }
  },
  messages: {
    name: "Tên sách không được để trống",
    quantity: "Số lượng không được để trống",
    price: "Giá tiền không được để trống",
  },
});