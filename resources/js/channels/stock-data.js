import Echo from 'laravel-echo';
import io from 'socket.io-client';

window.io = io;

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: `${window.location.hostname}:6001`,
    transports: ['websocket'],
    logToConsole: true,
});

const jobId = window.jobId;

window.Echo.channel(`stock-data.${jobId}`)
    .listen('.StockDataReady', (e) => {
        console.log('✅ Stock data ready:', e.result);

        document.getElementById( 'stocks-table' ).style.display = 'block';
        const tableBody = document.querySelector('#stocks-table tbody');
        tableBody.innerHTML = '';

        const loadingDiv = document.getElementById('loading');
        loadingDiv.innerHTML = '';
        let counter = 0;
        const data = Object.values(e.result.data);

        if (data.length === 0) {
            const cardBody = document.querySelector('#stocks-table .card-body');
            cardBody.innerHTML = 'No data available';
            return;
        }

        data.forEach(item => {
            counter++;

            const row = document.createElement('tr');
            const counterCell = document.createElement('td');
            counterCell.textContent = counter;

            const dateCell = document.createElement('td');
            dateCell.textContent = item.date;
            const openCell = document.createElement('td');
            openCell.textContent = item.open.toFixed(2);
            const highCell = document.createElement('td');
            highCell.textContent = item.high.toFixed(2);
            const lowCell = document.createElement('td');
            lowCell.textContent = item.low.toFixed(2);
            const closeCell = document.createElement('td');
            closeCell.textContent = item.close.toFixed(2);
            const volumeCell = document.createElement('td');
            volumeCell.textContent = item.volume;

            row.appendChild(counterCell);
            row.appendChild(dateCell);
            row.appendChild(openCell);
            row.appendChild(highCell);
            row.appendChild(lowCell);
            row.appendChild(closeCell);
            row.appendChild(volumeCell);

            tableBody.appendChild(row);
        });
    });
