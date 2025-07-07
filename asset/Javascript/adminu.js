// Populate User Table with data
// Populate User Table with data
function populateUserTable(users) {
  const tbody = document.getElementById('userTableBody');
  tbody.innerHTML = '';

  if (!users || users.length === 0) {
    const row = tbody.insertRow();
    const cell = row.insertCell(0);
    cell.colSpan = 5;
    cell.innerText = "No user found.";
    return;
  }

  users.forEach(user => {
    const row = tbody.insertRow();
    row.insertCell(0).innerText = user.fullname;
    row.insertCell(1).innerText = user.email;
    row.insertCell(2).innerText = user.phonenumber;
    row.insertCell(3).innerText = user.uaddress;

    const actionCell = row.insertCell(4);
    const delBtn = document.createElement("button");
    delBtn.textContent = "Delete";
    delBtn.className = "delete-btn";
    delBtn.onclick = function () {
      deleteUser(user.email);  // Direct delete without confirm
    };
    actionCell.appendChild(delBtn);
  });
}


function deleteUser(email) {
  const xhttp = new XMLHttpRequest();
  xhttp.open('POST', '../../controller/delete_user.php', true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("email=" + encodeURIComponent(email));

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        try {
          const response = JSON.parse(this.responseText);
          alert(response.message);
          if (response.success) {
            loadUsers();
          }
        } catch (e) {
          alert("Invalid response from server.");
          console.error("Parsing error:", e, this.responseText);
        }
      } else {
        alert("Error deleting user. Server returned status " + this.status);
      }
    }
  };
}


// Populate Contact Table with data
function populateContactTable(contacts) {
  const tbody = document.getElementById('contactTableBody');
  tbody.innerHTML = '';

  if (!contacts || contacts.length === 0) {
    const row = tbody.insertRow();
    const cell = row.insertCell(0);
    cell.colSpan = 3;
    cell.innerText = "No request found.";
    return;
  }

  contacts.forEach(contact => {
    const row = tbody.insertRow();
    row.insertCell(0).innerText = contact.cname;
    row.insertCell(1).innerText = contact.cemail;
    row.insertCell(2).innerText = contact.cmessage;
  });
}

// General AJAX fetch function
function fetchData(url, keyword, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.open('POST', url, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Use 'keyword' param; if empty, send empty string
  // Adjust POST param key depending on endpoint
  let paramName = 'keyword'; // generic name; adjust if needed

  // If url contains get_users.php or delete_user.php expect 'email' param instead
  if (url.includes('get_users.php') || url.includes('delete_user.php')) {
    paramName = 'email';
  } else if (url.includes('get_contact.php')) {
    paramName = 'email'; // or change to 'keyword' if your backend expects that
  }

  xhttp.send(paramName + "=" + encodeURIComponent(keyword || ""));

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        try {
          const data = JSON.parse(this.responseText);
          callback(data);
        } catch (e) {
          console.error("Invalid JSON response:", e);
        }
      } else {
        console.error("Error loading data:", this.status);
      }
    }
  };
}

// Search/load users
function searchUser() {
  const keyword = document.getElementById('search').value.trim();
  fetchData('../../controller/get_users.php', keyword, populateUserTable);
}

function loadUsers() {
  fetchData('../../controller/get_users.php', "", populateUserTable);
}

// Search/load contacts
function searchContact() {
  const keyword = document.getElementById('searchRequest').value.trim();
  fetchData('../../controller/get_contact.php', keyword, populateContactTable);
}

function loadContact() {
  fetchData('../../controller/get_contact.php', "", populateContactTable);
}

// Tab switching logic
function openTab(evt, tabName) {
  const content = document.getElementsByClassName("acontent");
  const links = document.getElementsByClassName("link");

  for (let i = 0; i < content.length; i++) {
    content[i].style.display = "none";
  }

  for (let i = 0; i < links.length; i++) {
    links[i].classList.remove("active");
  }

  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}

// Initial load of user data on page load
document.addEventListener('DOMContentLoaded', function() {
  loadUsers();
  loadContact();
  // Show default tab content
  const defaultTab = document.querySelector('.link.active') || document.querySelector('.link');
  if (defaultTab) defaultTab.click();
});
