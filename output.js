const button = document.querySelector('#button');
const tableBody = document.querySelector('.table_output');

button.addEventListener('click', function() {
    if (tableBody.classList.contains('liste')) {
      // If the table body already has the 'liste' class, remove it
      tableBody.classList.remove('liste');
      tableBody.classList.add('table_output');
    } else {
      // Otherwise, add the 'liste' class
      tableBody.classList.add('liste');
    }
  });