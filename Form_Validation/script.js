const form = document.getElementById('form');
const naame = document.getElementById('name');
const surname = document.getElementById('surname');
const date = document.getElementById('date');
const pesel = document.getElementById('pesel');
const city = document.getElementById('city');
const street = document.getElementById('street');
const building = document.getElementById('building');
const flat = document.getElementById('flat');
const postcode = document.getElementById('postcode');
const car = document.getElementById('car');
const gender = document.getElementsByName('gender')
const phone = document.getElementById('phone');
const info = document.getElementById('info');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs(){
    const nameVal = naame.value.trim()
    const surnameVal = surname.value.trim()
    const dateVal = date.value.trim()
    const peselVal = pesel.value.trim()
    const cityVal = city.value.trim()
    const streetVal = street.value.trim()
    const buildingVal = building.value.trim()
    const flatVal = flat.value.trim()
    const postcodeVal = postcode.value.trim()
    const phoneVal = phone.value.trim()
    const genderVal = gender.value

    //TESTS//

    if(nameVal === ''){
        setErrorFor(naame, 'Pole nie może być puste')
    }
    // name length
    else if(nameVal.length < 3 || nameVal.length > 14){
        setErrorFor(naame, 'Długość nie zgadza się (min.3, max.14)')
    }
    // capital letter check
    else if(nameVal[0] !== nameVal[0].toUpperCase()){
        setErrorFor(naame, 'Imie musi zaczynać się z wielkiej litery')
    }
    else if(!(/^[A-Za-zĘÓĄŚŁŻŹĆŃęóąśłżźćń]+$/.test(nameVal))){
        setErrorFor(naame, 'Imie nie musi zawierać znakow')
    }
    else{
        setSuccessFor(naame, naame)
    }

    //

    if(surnameVal === ''){
        setErrorFor(surname, 'Pole nie może być puste')
    }
    // surname length
    else if(surnameVal.length < 3 || surnameVal.length > 14){
        setErrorFor(surname, 'Długość nie zgadza się (min.3, max.14)')
    }
    // capital letter check
    else if(surnameVal[0] !== surnameVal[0].toUpperCase()){
        setErrorFor(surname, 'Nazwisko musi zaczynać się z wielkiej litery')
    }
    else if(!(/^[A-Za-zĘÓĄŚŁŻŹĆŃęóąśłżźćń]+$/.test(nameVal))){
        setErrorFor(surname, 'Nazwisko nie może zawierac znakow')
    }
    else{
        setSuccessFor(surname, surname)
    }

    //

    if(dateVal === ''){
        setErrorFor(date, 'Pole nie może być puste')
    }
    else if(!/^\d{2}-\d{2}-\d{4}$/.test(dateVal)){
        setErrorFor(date, 'Wprowadz datę w postaci dd-mm-yyyy')
    }
    else{
        setSuccessFor(date, date)
    }

    //

    if(peselVal === ''){
        setErrorFor(pesel, 'Pole nie może być puste')
    }
    // name length
    else if(!(/^[0-9]{11}$/.test(peselVal))){
        setErrorFor(pesel, 'Podany PESEL nieprawidlowy')
    }
    else{
        setSuccessFor(pesel, pesel)
    }

    //

    if(cityVal === ''){
        setErrorFor(city, 'Pole nie może być puste')
    }
    // word length check
    else if(cityVal.length < 3){
        setErrorFor(city, 'min. 3 znaki')
    }
    // capital letter check
    else if(cityVal[0] !== cityVal[0].toUpperCase()){
        setErrorFor(city, 'Miasto musi zaczynać się z wielkiej litery')
    }
    else if(!(/^[A-Za-zĘÓĄŚŁŻŹĆŃęóąśłżźćń]+$/.test(cityVal))){
        setErrorFor(city, 'Miasto nie może zawierac liczb')
    }
    else{
        setSuccessFor(city, city)
    }

    //

    if(streetVal === ''){
        setErrorFor(street, 'Pole nie może być puste')
    }
    // word length check
    else if(streetVal.length < 3){
        setErrorFor(street, 'min. 3 znaki')
    }
    // capital letter check
    else if(streetVal[0] !== streetVal[0].toUpperCase()){
        setErrorFor(street, 'Nazwa ulicy musi zaczynać się z wielkiej litery')
    }
    else if(!(/^[A-Za-zĘÓĄŚŁŻŹĆŃęóąśłżźćń]+$/.test(streetVal))){
        setErrorFor(street, 'Nazwa ulicy nie może zawierac liczb')
    }
    else{
        setSuccessFor(street, street)
    }

    //

    if(buildingVal === ''){
        setErrorFor(building, 'Pole nie może być puste')
    }
    // name length
    else if(!(/^[0-9]{1,3}[\/\-]?[0-9]{1,2}?[A-Za-z]?$/.test(buildingVal))){
        setErrorFor(building, "Nr domu nie może zawierać znaków (oprócz '/')")
    }
    else{
        setSuccessFor(building, building)
    }

    //

    if(flatVal === ''){
        setSuccessFor(flat, flat)
    }
    // name length
    else if(!(/^[0-9]{1,3}[\/\-]?[0-9]{1,2}$/.test(flatVal))){
        setErrorFor(flat, "Nr mieszkania nie może zawierać znaków (oprócz '/')")
    }
    else{
        setSuccessFor(flat, flat)
    }

    //

    if(postcodeVal === ''){
        setErrorFor(postcode, 'Pole nie może być puste')
    }
    else if(!(/^\d+(-\d+)?$/.test(postcodeVal))){
        setErrorFor(postcode, "Kod pocztowy nie może znaków (oprócz '-')")
    }
    else{
        setSuccessFor(postcode, postcode)
    }

    //

    if(phoneVal === ''){
        setErrorFor(phone, 'Pole nie może być puste')
    }
    else if(!(/^\+?\d+$/.test(phoneVal))){
        setErrorFor(phone, 'Telefon nie może zawierac liter')
    }
    else{
        setSuccessFor(phone, phone)
    }

    //

    // if(genderVal === ''){
    //     setErrorFor(gender, 'Pole nie może być puste')
    // }
    // else{
    //     setSuccessFor(gender, gender)
    // }
}

function setErrorFor(input, message){
    const formControl = input.parentElement; // .form-control
    const small = formControl.querySelector('small');

    // error message inside 'small'
    small.innerText = message;

    // add error class
    formControl.className = 'form-control error'
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success'
}

function isAnySigns(input){
    return /[0-9]/.test(input)
}

function peselCheck(input){
    var regexVar = new RegExp('^[0-9]{11}$');
    return regexVar.test(input);
}

function buildNumCheck(input){
    var regexVar = new RegExp('^[0-9]{1-3}$');
    return regexVar.test(input)
}