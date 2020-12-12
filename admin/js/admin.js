//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Solo presiona OK para continuar";

if (loginForm.myusername.value=="")
{
errorMessage+="Correo no diligenciado\n";
validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
errorMessage+="Contraseña no diligenciada!\n";
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
var okayMessage="Presiona OK para finalizar proceso de registro";

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
errorMessage+="Contraseña no diligenciada\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Confirmar contraseña no diligenciado\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="La contraseñas no coinciden\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Dirección de contraseña no diligenciada\n";
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
var okayMessage="Click OK para actualizar tu contraseña";

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
errorMessage+="Nueva contraseña no diligenciada\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Confirmar contraseña no diligenciada\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="La nueva contraseña y su confirmación no coinciden\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Dirección de correo inválida\n";
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

//validate position function
function isValidPosition(val) {
    var re = /[-]/;
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
        var msg = 'Porfavor introduzca un número entero positivo';
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
            var msg = 'Porfavor introduzca un número entero positivo';
            addValidationMessage(msg);
            addValidationField(cur_field)
            displayErrorInfo( form );
            return;
        }
        total += parseFloat(cur_field.value) * parseFloat( form.elements[ PRODUCT_ABBRS[i] + "_price" ].value );
    }
    form.elements['total'].value = formatDecimal(total);
}

//validate updateForm
function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="Click OK para cambiar tu contraseña";

if (updateForm.opassword.value=="")
{
errorMessage+="Porfavor ingresa tu anterior contraseña\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Porfavor ingresa tu nueva contraseña\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="Confirma tu nueva contraseña\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="¡La nueva contraseña y la de confirmación no coinciden!\n";
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
var okayMessage="Clic OK para agregar una nueva posición";

if (positionForm.position.value == "")
{
errorMessage+="Ingresa el nombre de la nueva posición\n";
validationVerified=false;
}
if (!isValidPosition(positionForm.position.value)) {
errorMessage+="¡Se proporcionó una posición no válida! No deje espacios entre palabras, es decir, intente reemplazar los espacios con un guión (-)\n";
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

//validate candidate form
function candidateValidate(candidateForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Haga clic en Aceptar para agregar nuevo candidato";

if (candidateForm.name.value == "")
{
errorMessage+="¡Ingrese el nombre del candidato!\n";
validationVerified=false;
}
if (candidateForm.position.selectedIndex == 0)
{
errorMessage+="Posición de candidato no establecida!\n";
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
var okayMessage="haga clic en Aceptar para ver los resultados de la encuesta en la posición elegida.";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="¡Posición no establecida! Elija una posición para recuperar los resultados de la encuesta correspondiente.\n";
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