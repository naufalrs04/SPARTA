import './bootstrap';
import 'flowbite';

document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission
    
    const searchTerm = document.getElementById('default-search').value.toLowerCase();
    const rows = document.querySelectorAll('table[name="tabel_jadwal"] tbody tr');

    rows.forEach(row => {
        const courseName = row.querySelector('td:nth-child(3)').innerText.toLowerCase(); // Assuming 3rd column has course name
        const courseCode = row.querySelector('td:nth-child(2)').innerText.toLowerCase(); // Assuming 2nd column has course code
        
        if (courseName.includes(searchTerm) || courseCode.includes(searchTerm)) {
            row.style.display = ''; // Show the row if it matches
        } else {
            row.style.display = 'none'; // Hide the row if it doesn't match
        }
    });
});