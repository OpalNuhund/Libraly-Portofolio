document.addEventListener('DOMContentLoaded', function() {
   // Highlight active link based on current page
   const currentPath = window.location.pathname.split('/').pop() || 'dashboard';
   const navLinks = document.querySelectorAll('.nav-icons a');
   
   navLinks.forEach(link => {
      const linkPage = link.getAttribute('data-page');
      if (linkPage === currentPath) {
         link.classList.add('active');
         document.getElementById('page-title').textContent = 
               linkPage === 'dashboard' ? 'Dashboard' : 
               linkPage.charAt(0).toUpperCase() + linkPage.slice(1);
      } else {
         link.classList.remove('active');
      }
   });
});


// Helper
function escapeHtml(text) {
      const div = document.createElement('div');
      div.textContent = text;
      return div.innerHTML;
}
function capitalizeFirst(text) {
      if(!text) return '';
      return text.charAt(0).toUpperCase() + text.slice(1);
}

document.getElementById('log-form').addEventListener('submit', (e) => {
   e.preventDefault();
   const bookTitle = e.target.bookTitle.value.trim();
   const memberName = e.target.memberName.value.trim();
   const borrowDate = e.target.borrowDate.value;
   const returnDate = e.target.returnDate.value;
   if (bookTitle && memberName) {
      const newLog = {
         id: logsData.length > 0 ? logsData[logsData.length - 1].id + 1 : 1,
         bookTitle,
         memberName,
         borrowDate,
         returnDate
      };
      logsData.push(newLog);
      renderLogs();
      e.target.reset();
      alert('Log peminjaman berhasil ditambahkan!');
   }
});

document.getElementById('category-form').addEventListener('submit', (e) => {
   e.preventDefault();
   const name = e.target.categoryName.value.trim();
   if (name) {
      const newCategory = {
         id: categoriesData.length > 0 ? categoriesData[categoriesData.length - 1].id + 1 : 1,
         name
      };
      categoriesData.push(newCategory);
      renderCategories();
      e.target.reset();
      alert('Kategori berhasil ditambahkan!');
   }
});


function renderLogs() {
   const tbody = document.getElementById('log-table-body');
   tbody.innerHTML = '';
   logsData.forEach(log => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
         <td>${escapeHtml(log.bookTitle)}</td>
         <td>${escapeHtml(log.memberName)}</td>
         <td>${escapeHtml(log.borrowDate)}</td>
         <td>${escapeHtml(log.returnDate)}</td>
         <td>
               <button class="btn-edit" data-id="${log.id}" data-type="log">Edit</button>
               <button class="btn-delete" data-id="${log.id}" data-type="log">Delete</button>
         </td>
      `;
      tbody.appendChild(tr);
   });
}

function renderCategories() {
   const tbody = document.getElementById('category-table-body');
   tbody.innerHTML = '';
   categoriesData.forEach(category => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
         <td>${escapeHtml(category.name)}</td>
         <td>
               <button class="btn-edit" data-id="${category.id}" data-type="category">Edit</button>
               <button class="btn-delete" data-id="${category.id}" data-type="category">Delete</button>
         </td>
      `;
      tbody.appendChild(tr);
   });
}