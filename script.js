document.addEventListener("DOMContentLoaded", function () {

  const form = document.getElementById("subscriptionForm");
  const loadBtn = document.getElementById("loadSubscriptionsBtn");
  const tableBody = document.getElementById("subscriptionsTableBody");

  // Модальное окно
  function showModal(text) {
    const modalText = document.getElementById("successModalText");
    const modalElement = document.getElementById("successModal");

    if (modalText) {
      modalText.textContent = text;
    }

    if (modalElement) {
      const modal = new bootstrap.Modal(modalElement);
      modal.show();
    }
  }

  // Вывод заявок в таблицу
  function renderSubscriptions(items) {

    if (!tableBody) return;

    tableBody.innerHTML = "";

    if (items.length === 0) {
      tableBody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center">
                        В базе пока нет заявок
                    </td>
                </tr>
            `;
      return;
    }

    items.forEach(function (item) {

      tableBody.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.phone}</td>
                    <td>${item.email}</td>
                    <td>${item.plan}</td>
                    <td>${item.message}</td>
                    <td>${item.newsletter == 1 ? "Да" : "Нет"}</td>
                    <td>${item.created_at}</td>
                </tr>
            `;
    });
  }

  // Загрузка данных из БД
  function loadSubscriptions() {

    $.ajax({
      url: "ajax.php",
      method: "GET",
      dataType: "json",

      success: function (response) {

        console.log(response);

        if (response.success) {
          renderSubscriptions(response.items);
        }
      },

      error: function (error) {
        console.log(error);
      }
    });
  }

  // Кнопка загрузки
  if (loadBtn) {

    loadBtn.addEventListener("click", function () {

      loadSubscriptions();

    });
  }

  // Отправка формы
  if (form) {

    form.addEventListener("submit", function (event) {

      event.preventDefault();

      const email = document.getElementById("email").value;
      const phone = document.getElementById("phone").value;

      const emailPattern =
          /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

      const phonePattern =
          /^[0-9+\-\s()]{6,}$/;

      if (!emailPattern.test(email)) {

        showModal("Некорректная почта");
        return;
      }

      if (!phonePattern.test(phone)) {

        showModal("Некорректный номер телефона");
        return;
      }

      $.ajax({

        url: "ajax.php",
        method: "POST",
        data: $(form).serialize(),
        dataType: "json",

        success: function (response) {

          console.log(response);

          if (response.success) {

            showModal("Данные успешно сохранены");

            renderSubscriptions(response.items);

            form.reset();
          }
        },

        error: function (error) {

          console.log(error);
        }
      });
    });
  }

  // Автозагрузка
  loadSubscriptions();

  setInterval(function () {
    loadSubscriptions();
  }, 20000);
});