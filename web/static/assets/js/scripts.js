const apiUrl = 'http://localhost:8001';

const createKnightForm = document.querySelector('#create-knight-form');
const deleteKnightButtons = document.querySelectorAll('.js-delete-btn');

if (createKnightForm) {
  console.debug('Attach submit event listener to #create-night-form');
  createKnightForm.addEventListener('submit', onCreateKnightFormSubmit);
}

if (deleteKnightButtons) {
  console.debug('Attach click event listener to .js-delete-btn');
  Array.from(deleteKnightButtons).forEach(btn =>
    btn.addEventListener('click', onDeleteKnightButtonClick)
  )
}

function onDeleteKnightButtonClick(event) {
  const id = event.currentTarget.dataset.id;

  fetch(`${apiUrl}/knights/${id}`, {
    method: 'delete'
  }).then(response => response.json())
    .then(response => {
      console.info(`delete /knights/${id}`, response);

      if (response.error) {
        return console.error(response.message);
      }

      document.querySelector(`#knight-tr-${id}`).remove();
    });
}

function onCreateKnightFormSubmit(event) {
  event.preventDefault();

  const data = new FormData(event.currentTarget);
  const name = data.get('name');

  const knight = {
    name
  };

  fetch(`${apiUrl}/knights`, {
    method: 'post',
    body: JSON.stringify(knight),
  }).then(response => response.json())
    .then(response => {
      console.info('post /knights', response);

      if (response.error) {
        return console.error(response.message);
      }

      alert(`Saved ${response.data.id}`);
    });
}
