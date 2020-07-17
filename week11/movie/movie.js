// Password display/hide checkbox
$("#show_password").change(function(event) {
    if($('#password').attr("type") == "text"){
        $('#password').attr('type', 'password');
    }else if($('#password').attr("type") == "password"){
        $('#password').attr('type', 'text');
    }
});

$("#show_confirm_password").change(function(event) {
    if($('#confirm').attr("type") == "text"){
        $('#confirm').attr('type', 'password');
    }else if($('#confirm').attr("type") == "password"){
        $('#confirm').attr('type', 'text');
    }
});

// Password client-side validate
$(".password-constraint").on('input', validatePassword);
function validatePassword() {
    let message= '';
    if (!/.{8,}/.test(this.value)) {
        message = 'At least eight characters. ';
    }
    if (!/.*[A-Z].*/.test(this.value)) {
        message += '\nAt least one uppercase letter. ';
    }
    if (!/.*[a-z].*/.test(this.value)) {
        message += '\nAt least one lowercase letter.';
    }
    this.setCustomValidity(message);
}




// Weather Widget
var _plm = _plm || [];
_plm.push(['_btn', 124047]);
_plm.push(['_loc','twxx0021']);
_plm.push(['location', document.location.host ]);
(function(d,e,i) {
    if (d.getElementById(i)) return;
    var px = d.createElement(e);
    px.type = 'text/javascript';
    px.async = true;
    px.id = i;
    px.src = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/js/btn/pelm.js?orig=en_ca';
    var s = d.getElementsByTagName('script')[0];

    var py = d.createElement('link');
    py.rel = 'stylesheet'
    py.href = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/styles/btn/styles.css'

    s.parentNode.insertBefore(px, s);
    s.parentNode.insertBefore(py, s);
})(document, 'script', 'plmxbtn');