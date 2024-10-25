async function fetchData(period) {
    const response = await fetch(`fetch_data.php?period=${period}`);
    const data = await response.json();

    // Prepare data for charts
    const flowData = data.map(entry => entry.flowRate);
    const pressureData = data.map(entry => entry.pressure);
    const qualityData = data.map(entry => entry.pH);

    // Update charts with new data (assumes updateChart function is defined)
    updateChart('flowChart', flowData, 'Water Flow (L/min)');
    updateChart('pressureChart', pressureData, 'Pressure (kPa)');
    updateChart('qualityChart', qualityData, 'Water Quality (pH)');
}

// Fetching data from the database when the page loads or when the time period changes.
window.onload = () => fetchData('');