function validateInput() {
    form = document.getElementById("form");

    profile= form["profile-data"].value.toString();
    if (!profile.endsWith(".")) {
	alert("Write a sentence!");
	return false;
    } else {
	return true;
    }
}
