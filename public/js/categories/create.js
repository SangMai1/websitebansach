var $form = $("form");
    $form.validate({
      rules: {
        name: {
          required: true,
          minlength: 3,
        }
      },
      messages: {
        name: "Tên danh mục không được để trống",
      },
    });