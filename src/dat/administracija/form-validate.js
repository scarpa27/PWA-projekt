$(function() {
    $("form[name='unos']").validate({
        rules: {
            datum: {
                required: !0,
                minlength: 16,
                maxlength: 16
            },
            naslov: {
                required: !0,
                minlength: 5,
                maxlength: 30
            },
            kratki: {
                required: !0,
                minlength: 10,
                maxlength: 100
            },
            tekst: {
                required: !0
            },
            slika: {
                required: !0
            },
            kategorija: {
                required: !0
            },
            arhiv: {
                required: !0
            }
        },
        messages: {
            datum: {
                required: "Potrebno je unijeti datum u 2021/06/31-08:59 formatu",
                minlength: "Potrebno je unijeti datum u 2021/06/31-08:59 formatu",
                maxlength: "Potrebno je unijeti datum u 2021/06/31-08:59 formatu"
            },
            naslov: {
                required: "Naslov ne smije biti prazan",
                minlength: "Naslov ne smije biti manji od 5 znakova",
                maxlength: "Naslov ne smije biti veći od 30 znakova"
            },
            kratki: {
                required: "Kratki sadržaj ne smije biti prazan",
                minlength: "Kratki sadržaj ne smije biti manji od 10 znakova",
                maxlength: "Kratki sadržaj ne smije biti veći od 100 znakova"
            },
            tekst: {
                required: "Tekst članka mora biti unešen"
            },
            slika: {
                required: "Slika je obavezna"
            },
            kategorija: {
                required: "Obavezno odabrati kategoriju"
            },
            arhiv: {
                required: "Obavezno označiti"
            }
        },
        submitHandler: function(e) {
            e.submit()
        }
    })

});