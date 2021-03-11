// const msgForm = document.querySelector('.mainSection__form');

// msgForm.addEventListener('submit', async function (e) {
//     e.preventDefault();
//     const message = document.querySelector('#msgInput').value;

//     try {
//         const res = await axios({
//             method: 'GET',
//             url: `/php/scripts/functions.php`,
//             data: {
//                 body: `sendMessage(${message})`,
//             },
//         });

//         console.log(res);

//         // if (res.data.status === 'success') {
//         //     await showAlert('success', 'Facture modifiée');
//         //     window.setTimeout(() => {
//         //         location.reload();
//         //     }, 1500);
//         // }
//     } catch (err) {
//         console.log('error', err.response.data.message);
//     }
// });
