<script>

    import moment from 'moment';

    export default {
        data() {
            return {
                selectedDrop: '',
                tempData: '',
                allDrops:[],
                isButtonDisabled: true,
                hours: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24],
                moment: moment
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:
        {
            addDropClicked()
            {
                this.isButtonDisabled = true
                $('#addDropToSchedule').modal('show');
            },

            dropSelected()
            {
                let self = this

                axios.post('/get-hours', 
                {
                    drop_id: this.selectedDrop,  
                })  
                .then(function (response) 
                {
                    self.tempData = response.data.data
                    self.isButtonDisabled = false
                })  
                .catch(function (error) 
                {  
                    console.log(error) 
                }); 
            },

            addDrop()
            {
                this.tempData.hours = JSON.parse(this.tempData.hours)
                this.allDrops.push(this.tempData)
                this.isButtonDisabled = true
                $('#addDropToSchedule').modal('hide');
                Swal.fire('Success','Drop Added Successfully','success');
                $(".selectpicker").selectpicker();
            },

            deleteDrop(index)
            {
                this.allDrops.splice(index, 1);
                Swal.fire('Success','Drop Removed Successfully','success');
            },

            generatePDF()
            {
                let self = this

                axios.post('/generate-pdf', 
                {
                    drops: this.allDrops,  
                })  
                .then(function (response) 
                {
                    console.log(response.data)
                    window.open(response.data.url);
                })  
                .catch(function (error) 
                {  
                    console.log(error) 
                }); 
            },

            eyeTypeChanged(value, dropIndex)
            {
                if(value == "right")
                {
                    this.allDrops[dropIndex].is_right = true
                    this.allDrops[dropIndex].is_left = false
                }
                else if(value == "left")
                {
                    this.allDrops[dropIndex].is_right = false
                    this.allDrops[dropIndex].is_left = true
                }
                else if(value == "both")
                {
                    this.allDrops[dropIndex].is_right = true
                    this.allDrops[dropIndex].is_left = true
                }
                else
                {
                    this.allDrops[dropIndex].is_right = false
                    this.allDrops[dropIndex].is_left = false
                }
            }
        }
    }
</script>