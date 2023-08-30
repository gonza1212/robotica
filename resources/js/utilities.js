window.countChars = function(id, input, max) {
    document.getElementById(id).classList = (document.getElementById(input).value.length > max) ? "fw-bold text-danger text-end" : "text-muted text-end";
    document.getElementById(id).innerText = document.getElementById(input).value.length + "/" + max;
}