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

  console.log('test');

  
  function calculatekmdiff() {
    const kmStart = parseFloat(document.getElementById('km_start').value) || 0;
    const kmEnd = parseFloat(document.getElementById('km_end').value) || 0;

    const kmDiff = kmEnd >= kmStart ? kmEnd - kmStart : "0";
    document.getElementById('kmdiff').value = kmDiff;
}

window.onload = function() {
    document.getElementById('km_start').addEventListener('input', calculatekmdiff);
    document.getElementById('km_end').addEventListener('input', calculatekmdiff);
    
        document.getElementById('kmdiff').value = "";
    
};
  


