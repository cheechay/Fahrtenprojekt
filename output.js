const button = document.querySelector('#button');
const tableBody = document.getElementById('table_output');

button.addEventListener('click', function() {
    if (tableBody.classList.contains('liste')) {
      // If the table body already has the 'liste' class, remove it
      tableBody.classList.remove('liste');
    } else {
      // Otherwise, add the 'liste' class
      tableBody.classList.add('liste');
    }
  });