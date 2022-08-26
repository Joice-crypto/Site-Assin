$( document ).ready( function () {
    $( "#LoginForm" ).validate( {
        rules: {
            email: {
                required: true,
                email: true
            },
            pw: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Campo email é obrigatório",
                email: "Email inválido"
            },
            pw: {
                required: "Campo senha é obrigatório",
                minlength: "Sua senha deve ter pelo menos 6 caracteres"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    } );

    $("#createHighlight").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtDescriptionPT-BR": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionEN-US": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionES-ES": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionFR-FR": {
                required: true,
                maxlength: 512
            },
            "fileThumb": {
                required: true,
                extension: "jpg|jpeg|png"
            },
            "txtContentPT-BR": {
                required: true
            },
            "txtContentEN-US": {
                required: true
            },
            "txtContentES-ES": {
                required: true
            },
            "txtContentFR-FR": {
                required: true
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtDescriptionPT-BR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionEN-US": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionES-ES": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionFR-FR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "fileThumb": {
                required: "Uma imagem precisa ser selecionada.",
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editHighlight").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtDescriptionPT-BR": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionEN-US": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionES-ES": {
                required: true,
                maxlength: 512
            },
            "txtDescriptionFR-FR": {
                required: true,
                maxlength: 512
            },
            "fileThumb": {
                required: true,
                extension: "jpg|jpeg|png"
            },
            "txtContentPT-BR": {
                required: true
            },
            "txtContentEN-US": {
                required: true
            },
            "txtContentES-ES": {
                required: true
            },
            "txtContentFR-FR": {
                required: true
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtDescriptionPT-BR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionEN-US": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionES-ES": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionFR-FR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "fileThumb": {
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#createDepoimento").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtDescriptionPT-BR": {
                required: true,
                maxlength: 100
            },
            "txtDescriptionEN-US": {
                required: true,
                maxlength: 100
            },
            "txtDescriptionES-ES": {
                required: true,
                maxlength: 100
            },
            "txtDescriptionFR-FR": {
                required: true,
                maxlength: 100
            },
            "fileThumb": {
                required: true
            },
            "txtContentPT-BR": {
                required: true
            },
            "txtContentEN-US": {
                required: true
            },
            "txtContentES-ES": {
                required: true
            },
            "txtContentFR-FR": {
                required: true
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtDescriptionPT-BR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionEN-US": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionES-ES": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionFR-FR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "fileThumb": {
                required: "Uma imagem precisa ser selecionada.",
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        depoimento: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });


    $("#editCard").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtDescriptionPT-BR": {
                required: false,
                maxlength: 512
            },
            "txtDescriptionEN-US": {
                required: false,
                maxlength: 512
            },
            "txtDescriptionES-ES": {
                required: false,
                maxlength: 512
            },
            "txtDescriptionFR-FR": {
                required: false,
                maxlength: 512
            },
            "fileThumb": {
                extension: "jpg|jpeg|png"
            },
            "txtContentPT-BR": {
                required: false
            },
            "txtContentEN-US": {
                required: false
            },
            "txtContentES-ES": {
                required: false
            },
            "txtContentFR-FR": {
                required: false
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtDescriptionPT-BR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionEN-US": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionES-ES": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "txtDescriptionFR-FR": {
                required: "O campo descrição é obrigatório.",
                maxlength: "O campo descrição não deve exceder 512 caracteres."
            },
            "fileThumb": {
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#newItemForm").validate({
        rules: {
            "txtNamePT-BR": {
                required: true,
                maxlength: 50
            },
            "txtNameEN-US": {
                required: true,
                maxlength: 50
            },
            "txtNameES-ES": {
                required: true,
                maxlength: 50
            },
            "txtNameFR-FR": {
                required: true,
                maxlength: 50
            },
            "txtRedirection": {
                required: true,
                url: false
            }
        },
        messages: {
            "txtNamePT-BR": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameEN-US": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameES-ES": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameFR-FR": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtRedirection": {
                required: "O campo redirecionamento é obrigatório.",
                url: "URL inválida."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editItemForm").validate({
        rules: {
            "txtNamePT-BR": {
                required: true,
                maxlength: 50
            },
            "txtNameEN-US": {
                required: true,
                maxlength: 50
            },
            "txtNameES-ES": {
                required: true,
                maxlength: 50
            },
            "txtNameFR-FR": {
                required: true,
                maxlength: 50
            },
            "txtEditRedirection": {
                required: true,
                url: false
            }
        },
        messages: {
            "txtNamePT-BR": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameEN-US": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameES-ES": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtNameFR-FR": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome deve ter no máximo 50 caracteres"
            },
            "txtEditRedirection": {
                required: "O campo redirecionamento é obrigatório.",
                url: "URL inválida."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#createPage").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtContentPT-BR": {
                required: true
            },
            "txtContentEN-US": {
                required: true
            },
            "txtContentES-ES": {
                required: true
            },
            "txtContentFR-FR": {
                required: true
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editPage").validate({
        rules: {
            "txtTitlePT-BR": {
                required: true,
                maxlength: 255
            },
            "txtTitleEN-US": {
                required: true,
                maxlength: 255
            },
            "txtTitleES-ES": {
                required: true,
                maxlength: 255
            },
            "txtTitleFR-FR": {
                required: true,
                maxlength: 255
            },
            "txtContentPT-BR": {
                required: true
            },
            "txtContentEN-US": {
                required: true
            },
            "txtContentES-ES": {
                required: true
            },
            "txtContentFR-FR": {
                required: true
            }
        },
        messages: {
            "txtTitlePT-BR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleEN-US": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleES-ES": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtTitleFR-FR": {
                required: "O campo título é obrigatório.",
                maxlength: "O campo título não deve exceder 255 caracteres."
            },
            "txtContentPT-BR": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentEN-US": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentES-ES": {
                required: "O campo conteúdo é obrigatório."
            },
            "txtContentFR-FR": {
                required: "O campo conteúdo é obrigatório."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });

    $("#createGalleryImage").validate({
        rules: {
            "fileGalleryImage": {
                required: true,
                extension: "jpg|jpeg|png"
            },
            "txtDescription": {
                maxlength: 512
            }
        },
        messages: {
            "fileGalleryImage": {
                required: "Uma imagem precisa ser selecionada.",
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            },
            "txtDescription": {
                maxlength: "O campo descrição não deve ter mais que 512 caracteres"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editCarouselImage").validate({
        rules: {
            "fileCarouselImage": {
                required: true,
                extension: "jpg|jpeg|png"
            }
        },
        messages: {
            "fileCarouselImage": {
                required: "Uma imagem precisa ser selecionada.",
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#createCarouselImage").validate({
        rules: {
            "fileCarouselImage": {
                required: true,
                extension: "jpg|jpeg|png"
            }
        },
        messages: {
            "fileCarouselImage": {
                required: "Uma imagem precisa ser selecionada.",
                extension: "Somente são aceitas imagens com extensão .jpg, .jpeg e .png."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#createServerFile").validate({
        rules: {
            "fileServer": {
                required: true,
                extension: "jpeg|jpg|png|doc|docx|pdf|txt"
            }
        },
        messages: {
            "fileServer": {
                required: "Um arquivo precisa ser selecionado.",
                extension: "Somente são aceitas imagens com extensão 'jpeg', 'jpg', 'png', 'doc', 'docx', 'pdf', 'txt'."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#videoForm").validate({
        rules: {
            "inputLink": {
                required: true,
                url: true
            }
        },
        messages: {
            "inputLink": {
                required: "O campo link é obrigatório.",
                url: "URL inválida."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });
    
    $("#registerUser").validate({
        rules: {
            "name": {
                required: true,
                maxlength: 255
            },
            "email": {
                required: true,
                maxlength: 255
            },
            "confirmEmail": {
                required: true,
                equalTo: "#inputEmail",
                maxlength: 255
            },
            "pw": {
                required: true,
                maxlength: 255
            },
            "confirmPassword": {
                required: true,
                equalTo: "#inputPassword",
                maxlength: 255
            }
        },
        messages: {
            "name": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome não deve exceder 255 caracteres."
            },
            "email": {
                required: "O campo email é obrigatório.",
                maxlength: "O campo email não deve exceder 255 caracteres."
            },
            "confirmEmail": {
                required: "O campo confirmar email é obrigatório.",
                equalTo: "Os emails não coincidem.",
                maxlength: "O campo email não deve exceder 255 caracteres."
            },
            "pw": {
                required: "O campo senha é obrigatório.",
                maxlength: "O campo senha não deve exceder 255 caracteres."
            },
            "confirmPassword": {
                required: "O campo confirmar senha é obrigatório.",
                equalTo: "As senhas não coincidem.",
                maxlength: "O campo senha não deve exceder 255 caracteres."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editNameForm").validate({
        rules: {
            "txtNome": {
                required: true,
                maxlength: 255
            }
        },
        messages: {
            "txtNome": {
                required: "O campo nome é obrigatório.",
                maxlength: "O campo nome não deve exceder 255 caracteres"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editEmailForm").validate({
        rules: {
            "txtEmail": {
                required: true,
                email: true,
                maxlength: 255
            }
        },
        messages: {
            "txtEmail": {
                required: "O campo email é obrigatório.",
                email: "Email inválido.",
                maxlength: "O campo email não deve exceder 255 caracteres."
            }    
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });

    $("#editPasswordForm").validate({
        rules: {
            "txtPassword": {
                required: true,
                maxlength: 255
            },
            "txtOldPassword": {
                required: true,
                maxlength: 255
            }
        },
        messages: {
            "txtPassword": {
                required: "O campo senha é obrigatório.",
                maxlength: "O campo senha não deve exceder 255 caracteres."
            },
            "txtOldPassword": {
                required: "O campo senha atual é obrigatório.",
                maxlength: "O campo senha atual não deve exceder 255 caracteres."
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });
} );
