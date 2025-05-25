function populateTable(users) {
      const tbody = document.getElementById('userTableBody');
      tbody.innerHTML = '';

      if (users.length === 0) {
        let row = tbody.insertRow();
        let cell = row.insertCell(0);
        cell.colSpan = 4;
        cell.innerText = "No user found.";
        return;
      }

      users.forEach(user => {
        let row = tbody.insertRow();
        row.insertCell(0).innerText = user.fullname;
        row.insertCell(1).innerText = user.email;
        row.insertCell(2).innerText = user.phonenumber;
        row.insertCell(3).innerText = user.uaddress;
      });
    }

    function searchUser() {
      let keyword = document.getElementById('search').value.trim();
      let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../../controller/get_users.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("email=" + encodeURIComponent(keyword));

      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          let users = JSON.parse(this.responseText);
          populateTable(users);
        }
      };
    }

    function loadUsers() {
      let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../../controller/get_users.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("email=");

      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          let users = JSON.parse(this.responseText);
          populateTable(users);
        }
      };
    }

    function openTab(evt, tabName) {
      let i, content, links;

      content = document.getElementsByClassName("acontent");
      for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
      }

      links = document.getElementsByClassName("link");
      for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" active", "");
      }

      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }