var $form = $("form");
    $form.validate({
      rules: {
        name: {
          required: true,
          minlength: 3,
        },
        route: {
          required: true,
          minlength: 3,
        }
      },
      messages: {
        name: "Tên chức năng không được để trống",
        name: "Tối thiểu 3 kí tự",
        route: "Đường dẫn không được để trống",
      },
    });