var $form = $("form");
$form.validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 8
        },
        date_of_birth: {
          required: true,
          date: true
        },
        phone: {
          required: true,
          minlength: 11
        },
        cmnd: {
          required: true,
          minlength: 9
        },
        address: {
          required: true,
          minlength: 3
        }
      },
      messages: {
        name: "Tên nhân sự không được để trống",
        name: "Phải tối thiểu 3 từ",
        email: "Email không được để trống",
        password: "Tên nhân sự không được để trống",
        password: "Phải tối thiểu 8 ký tự",
        date_of_birth: "Ngày sinh không được để trống",
        phone: "Số điện thoại không được để trống",
        phone: "Phải tối thiểu 11 số",
        cmnd: "CMND không được để trống",
        cmnd: "Phải tối thiểu 9 số",
        address: "Địa chỉ không được để trống",
      }
    });