<div style="max-width:280px; max-height:150px;" class="relative">
    <div wire:ignore x-data="{
      labels: @entangle('labels'),
      visits: @entangle('data'),
      init() {
        console.log(this.visits);
        const dataDoughnut = {
          labels: this.labels,
          datasets: [
            {
              label: 'Visitas',
              data: this.visits,
              backgroundColor: [
                'rgb(133, 105, 241)',
                'rgb(164, 10, 241)',
                'rgb(101, 143, 241)',
                'rgb(101, 183, 241)',
              ],
              hoverOffset: 4,
            },
          ],
        };
      
        const configDoughnut = {
          type: 'doughnut',
          data: dataDoughnut,
          options: {plugins: {
            legend: {
                display: true,
                labels: {
                    color: 'rgb(255, 255, 255)',
                    boxWidth: 8,
                    boxHeight: 8
                },
                position: 'right',
            }
        },
        maintainAspectRatio: false,
        aspectRatio:2
        },
        };
      
        var chartBar = new Chart(
          this.$refs.chartdoughnut,
          configDoughnut
        );

        Livewire.on('updateTheChart', () => {
            chartBar.data.datasets[0].data = this.visits;
            chartBar.data.labels = this.labels;

            chartBar.update();
        })
      }
    }">
        <canvas x-ref="chartdoughnut"></canvas>
    </div> 
</div>
