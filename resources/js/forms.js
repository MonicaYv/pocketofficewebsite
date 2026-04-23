document.getElementById("newsletterForm").addEventListener("submit", function(e) {
    e.preventDefault();

    let emailInput = this.querySelector('input[name="mail"]');
    let email = emailInput.value.trim();

    if (email === "") {
        alert("Please enter your email!");
        emailInput.focus();
        return;
    }

    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,6}$/i;
    if (!emailPattern.test(email)) {
        alert("Enter a valid email address!");
        emailInput.focus();
        return;
    }

    let formData = new FormData();
    formData.append("mail", email);

    fetch("https://mapui1.aibuzz.net/send_mail", {
        method: "POST",
        body: formData
    })
    .then(res => res.text()) // get raw text first
    .then(text => {
        // parse JSON safely
        let data;
        try {
            data = JSON.parse(text);
        } catch (err) {
            alert("❌ Invalid response from server");
            console.error("JSON parse error:", err, text);
            return;
        }

        if (data.result === "success") {
            alert("✅ successfully!");
            emailInput.value = "";
        } else {
            alert("❌ Error: " + data.msg);
        }
    })
    .catch(err => {
        alert("❌ Something went wrong. Try again.");
        console.error(err);
    });
});
