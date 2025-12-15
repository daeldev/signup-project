document.addEventListener("DOMContentLoaded", () => {
	const card = document.querySelector(".card");
	const form = document.querySelector("form");

	card.addEventListener("click", () => {
		form.scrollIntoView({ behavior: "smooth"});
	});

	const firstName = document.getElementById('firstName');
	const lastName = document.getElementById('lastName');
	const email = document.getElementById('email');
	const password = document.getElementById('password');
	
	const firstNameError = document.getElementById('firstNameError');
	const lastNameError = document.getElementById('lastNameError');
	const emailError = document.getElementById('emailError');
	const passwordError = document.getElementById('passwordError');

	// LIMPA ERRO AO CLICAR NO INPUT
    function clearError(input, errorElement) {
        input.addEventListener("focus", () => {
            input.style.border = "";
            errorElement.innerText = "";

			if (input == email){
				email.placeholder = "Email Address"
				email.classList.remove("emailError");
			}
        });
    }

    clearError(firstName, firstNameError);
    clearError(lastName, lastNameError);
    clearError(email, emailError);
    clearError(password, passwordError);

	form.addEventListener('submit', async (event) => {
		event.preventDefault();
		let validSubmit = true;

		const namePattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;

		if (!namePattern.test(firstName.value)) {
			validSubmit = false;
			firstNameError.innerText = "First name contains invalid characters."
			firstName.style.border = "1px solid red";
		}
		
		if (!namePattern.test(lastName.value)) {
			validSubmit = false;
			lastNameError.innerText = "Last name contains invalid characters."
			lastName.style.border = "1px solid red";
		}
		
		// Optional: Add length constraints
		if (firstName.value.length < 2) {
			validSubmit = false;
			firstNameError.innerText = "First name is too short.";
			firstName.style.border = "1px solid red";
		}

		// Optional: Add length constraints
		if (lastName.value.length < 2) {
			validSubmit = false;
			lastNameError.innerText = "Last name is too short.";
			lastName.style.border = "1px solid red";
		}

		if (firstName.value.length > 50) {
			validSubmit = false;
			firstNameError.innerText = "First name is too long.";
			firstName.style.border = "1px solid red";
		}

		if (lastName.value.length > 50) {
			validSubmit = false;
			lastNameError.innerText = "Last name is too long.";
			lastName.style.border = "1px solid red";
		}

		const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		if (!emailPattern.test(email.value)){
			validSubmit = false;
			emailError.innerHTML = "Invalid email address."
			email.style.border = "1px solid red";
			email.placeholder = "email@example/com";
			email.classList.add("emailError");
		}

		const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

		if (!passwordPattern.test(password.value)){
			validSubmit = false;
			passwordError.innerText = "Your password must be at least 8 characters long and contain at least: 1 Uppercase letter, 1 Lowercase letter and 1 digit."
			password.style.border = "1px solid red";
		}
		
		// Se todos os inputs estiverem válidos
		if(validSubmit){
			// Armazena os dados num objeto "DTO"
			const data = {
				firstName: firstName.value,
				lastName: lastName.value,
				email: email.value,
				password: password.value,
			};
			
			try{
				// Envia a requisição HTTP através da API fetch, incluindo o objeto com os dados
				const response = await fetch("/api/client/register", {
					method: "POST", // Define o método POST, pois está enviando dados
					headers: {
						"Content-Type": "application/json" // Define o conteúdo JSON
					},
					body: JSON.stringify(data) // Tranforma o objeto data em string JSON
				});

				// Verifica se a resposta foi sucesso (status 200-299)
				if(!response.ok){
					// Se a resposta for um erro, lança um erro com o status e cai no catch
					throw new Error("HTTP error, status = " + response.status); 
				}

				// Define um objeto que vai conter a resposta em json
				const jsonData = await response.json();

				// Trata com o resultado do backend
				if(jsonData.success){
					alert("Cadastro realizado com sucesso!")
				}else{
					alert("Erro do servidor: " + (jsonData.error || "erro desonhecido"));
				}
			} catch(error){

				// Trata qualquer erro
				console.error("Ocorreu um erro na requisição: ", error);
				alert("Erro de conexão com o servidor");
			}
		}
	});
});