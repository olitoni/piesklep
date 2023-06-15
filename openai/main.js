const apiKey = "klucz od tadzia";
const url = "https://api.openai.com/v1/completions";

function ask() {
  let input = document.querySelector('#js-prompt').value;
  let ansbox = document.querySelector('#js-ans');
  if (!input) return;

  ansbox.innerHTML += `<p class="ans"><b>User: </b>${input}</p>`

  document.querySelector('#js-prompt').value = '';


  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Authorization: `Bearer ${apiKey}`,
    },
    body: JSON.stringify({
      model: "text-davinci-003",
      prompt: input,
      temperature: 1,
      max_tokens: 256,
      top_p: 1,
      frequency_penalty: 0,
      presence_penalty: 0
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      let text = data['choices'][0]['text'] || '';
      ansbox.innerHTML += `<p class="ans"><b>AI: </b>${text}</p>`
    });
}
