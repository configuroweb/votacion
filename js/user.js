//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Clic OK para continuar";

if (loginForm.myusername.value=="")
{
errorMessage+="Correo no diligenciado\n";
validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
errorMessage+="Contraseña no diligenciado\n";
validationVerified=false;
}
if (!isValidEmail(loginForm.myusername.value)) {
errorMessage+="Se proporcionó una dirección de correo electrónico no válida.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//function to handle register-form validation
function registerValidate(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="haga clic en Aceptar para procesar el registro";

if (registerForm.firstname.value=="")
{
errorMessage+="Nombre no diligenciado\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Apellido no diligenciado\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Correo no diligenciado\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="¡Contraseña no proporcionada!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Campo de Confirmación de Contraseña no diligenciado\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Contraseña y Confirmación de Contraseña no coinciden\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Se proporcionó una dirección de correo electrónico no válida.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//function to handle update-form validation
function updateProfile(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="haga clic en Aceptar para actualizar su cuenta";

if (registerForm.firstname.value=="")
{
errorMessage+="Nombre no diligenciado\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Apellido no diligenciado\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Correo no diligenciado\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="¡Nueva contraseña no proporcionada!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Confirmar no contraseña no diligenciada\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Contraseña y Confirmar Contraseña no Coinciden\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Se proporcionó una dirección de correo electrónico no válida.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//validate email function
function isValidEmail(val) {
	var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}

//validate special PIN
function isValidSpecialPIN(val) {
	var re = /^[0-9][0-9][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

//validate special PIN length
function isValidLength(val){
	var length = 12;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

// onchange of qty field entry totals the price
function getProductTotal(field) {
    clearErrorInfo();
    var form = field.form;
	if (field.value == "") field.value = 0;
	if ( !isPosInt(field.value) ) {
        var msg = 'Introduzca un número entero positivo';
        addValidationMessage(msg);
        addValidationField(field)
        displayErrorInfo( form );
        return;
	} else {
		var product = field.name.slice(0, field.name.lastIndexOf("_") ); 
        var price = form.elements[product + "_price"].value;
		var amt = field.value * price;
		form.elements[product + "_tot"].value = formatDecimal(amt);
		doTotals(form);
	}
}

function doTotals(form) {
    var total = 0;
    for (var i=0; PRODUCT_ABBRS[i]; i++) {
        var cur_field = form.elements[ PRODUCT_ABBRS[i] + "_qty" ]; 
        if ( !isPosInt(cur_field.value) ) {
            var msg = 'Introduzca un número entero positivo';
            addValidationMessage(msg);
            addValidationField(cur_field)
            displayErrorInfo( form );
            return;
        }
        total += parseFloat(cur_field.value) * parseFloat( form.elements[ PRODUCT_ABBRS[i] + "_price" ].value );
    }
    form.elements['total'].value = formatDecimal(total);
}

//validate orderform
function finalCheck(orderForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="haga clic en Aceptar para procesar su pedido";

if (orderForm.quantity.value=="")
{
errorMessage+="Proporcione una cantidad.\n";
validationVerified=false;
}
if (orderForm.quantity.value==0)
{
errorMessage+="Proporcione una cantidad en lugar de 0.\n";
validationVerified=false;
}
if(orderForm.total.value=="")
{
errorMessage+="¡No se ha calculado el total! Indique primero la cantidad.\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//validate updateForm
function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="click OK para cambiar tu contraseña";

if (updateForm.opassword.value=="")
{
errorMessage+="Proporcione su contraseña anterior.\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Proporcione su nueva contraseña.\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="Confirme su nueva contraseña\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Contraseña y Confirmar Contraseña\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}


//validate reserve form
function reserveValidate(reserveForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="haga clic en Aceptar para reservar esta mesa";

if (reserveForm.tNumber.selectedIndex==0)
{
errorMessage+="¡Seleccione una tabla por su número!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

//validate position form
function positionValidate(positionForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="haga clic en Aceptar para ver los candidatos en el puesto elegido";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="Posición no seleccionada!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}