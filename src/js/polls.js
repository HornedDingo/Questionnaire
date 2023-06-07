async function loadData() {
    let response = await fetch('../controllers/polls.php');
    let polls = await response.json();
    displayPolls(polls);
}

function displayPolls(polls) {
    const pollDiv = document.getElementById('polls');
    pollDiv.innerHTML = '';

    polls.forEach(poll => {
        const pollEl = document.createElement('div');
        pollEl.className = 'poll';
        const titleH3 = document.createElement('h3');
        titleH3.textContent = poll.name_poll;
        pollEl.appendChild(titleH3);

        const form = document.createElement('form');
        form.className = 'poll-form';
        form.addEventListener('submit', submitForm);

        poll.questions.forEach(question => {
            const questionDiv = document.createElement('div');
            questionDiv.className = 'question';
            questionDiv.id = `question-${question.ID_question}`;
        
            const questionText = document.createElement('h4');
            questionText.textContent = question.question_text;
            questionDiv.appendChild(questionText);
        
            question.answers.forEach(answer => {
                const label = document.createElement('label');
                const input = document.createElement('input');
                input.type = question.multiple ? 'checkbox' : 'radio';
                input.name = `question-${question.ID_question}`;
                input.value = answer.ID_answer;
                label.appendChild(input);
                label.appendChild(document.createTextNode(answer.name_answer));
                questionDiv.appendChild(label);
            });
        
            form.appendChild(questionDiv);
        });

        const submitButton = document.createElement('button');
        submitButton.type = 'submit';
        submitButton.textContent = 'Проголосовать';
        form.appendChild(submitButton);

        pollEl.appendChild(form);

        pollDiv.appendChild(pollEl);
    });
}

async function submitForm(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    const response = await fetch('submit_poll.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();
    alert('Ваш голос защитан! Спасибо за участие.');
}

loadData();