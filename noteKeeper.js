// Gather all fields from the DOM
const sign_up = document.getElementById("sign_up");
const whitelist = ["name", "email", "password", "human_validation"];

const allFields = document.querySelectorAll("input");
allFields.forEach(field => {
	
});

$("#note").bind("input propertychange", function() {
	$.ajax({
		method: "POST",
		url: "updateDatabase.php",
		data: { content: $("#note").val() },
		datatype: "text/html"
	});
});