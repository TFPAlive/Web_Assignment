var modal = document.getElementById("myModal"),
		span = document.getElementsByClassName("close")[0],
		id_message = "1";

function inform(element) {
	modal.getElementsByTagName("input")[0].value = element.parentNode.getElementsByTagName("input")[1].value;
	id_message = element.parentNode.parentNode.getElementsByTagName("h4")[0].innerText.split("#")[1];
	modal.style.display = "block";
}

span.onclick = function() {
	modal.style.display = "none";
};

function add_notice(alert, string) {
	return '<div class="alert ' + alert + '" role="alert"><strong>' + string + '</strong></div>';
}
