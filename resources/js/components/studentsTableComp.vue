<template>
    <h1>Student List</h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="student in students" :key="student.id">
            <td>{{ student.id }}</td>
            <td>{{ student.fname }}</td>
            <td>{{ student.lname }}</td>
            <td>{{ student.email }}</td>
            <td>{{ student.password }}</td>
            <td>{{ student.created_at }}</td>
            <td>{{ student.updated_at }}</td>
            <td><button @click="deleteStudent(student)" class="btn btn-danger">Delete</button></td>
            <td><button @click="editStudent(student)" class="btn btn-warning">Edit</button></td>
        </tr>
        </tbody>
    </table>

    <div v-if="isEditModalOpen" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Student</h5>
            <button type="button" class="close" @click="closeModal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="edit-fname">First Name</label>
                <input v-model="selectedStudent.fname" type="text" class="form-control" id="edit-fname" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label for="edit-lname">Last Name</label>
                <input v-model="selectedStudent.lname" type="text" class="form-control" id="edit-lname" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label for="edit-email">Email</label>
                <input v-model="selectedStudent.email" type="email" class="form-control" id="edit-email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="edit-password">Password</label>
                <input v-model="selectedStudent.password" type="password" class="form-control" id="edit-password" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <label for="edit-created-at">Created At</label>
                <input v-model="selectedStudent.created_at" type="text" class="form-control" id="edit-created-at" placeholder="Enter Created At">
              </div>
              <div class="form-group">
                <label for="edit-updated-at">Updated At</label>
                <input v-model="selectedStudent.updated_at" type="text" class="form-control" id="edit-updated-at" placeholder="Enter Updated At">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button @click="updateStudent(selectedStudent.id)" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </template>
  
  <script>
  import axios from 'axios';

  export default {
    // variables
    data() {
      return {
        students: [],
        oldChecksum : '',
        isEditModalOpen: false,
        selectedStudent: {
          id: '',
          fname: '',
          lname: '',
          email: '',
          password: '',
          created_at: '',
          updated_at: '',
        },
      };
    },
    // create() is called when a component is created or initialized. then it will trigger the fetchStudents() method
    created() {
      this.checkSum();
      this.fetchStudents();
      this.isDbChange();
    },
    // methods then it's getting data to db then pasting it to students array
    methods: {

      deleteStudent(student){
        axios.delete(`/api/deleteStudentById/${student.id}`).then(response => {
            console.log('delete success');
          })
          .catch(error => {
            console.error(error);
          });
      },

      updateStudent(id){
        axios.put(`/api/updateStudentById/${id}`,{
          fname:this.selectedStudent.fname,
          lname:this.selectedStudent.lname,
          email:this.selectedStudent.email,
          password:this.selectedStudent.password
        }).then(response => {
            console.log('update success');
          })
          .catch(error => {
            console.error(error);
          });
      },

      fetchStudents() {
        axios.get('/api/viewStudent').then(response => {
            this.students = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      },

      editStudent(student) {
        this.selectedStudent.id = student.id;
        this.selectedStudent.fname = student.fname;
        this.selectedStudent.lname = student.lname;
        this.selectedStudent.email = student.email;
        this.selectedStudent.password = student.password;
        this.selectedStudent.created_at = student.created_at;
        this.selectedStudent.updated_at = student.updated_at;
        this.isEditModalOpen = true;
      },

      closeModal(){
        this.isEditModalOpen = false;
      },

      checkSum(){
        axios.get('/api/getChecksum').then(response => {
            this.oldChecksum = response.data['result'];
        })
      },
      
      isDbChange(){
        setInterval(() => {
          axios.get('/api/getChecksum').then(response => {
            if (this.oldChecksum != response.data['result']) {
              this.oldChecksum = response.data['result'];
              this.fetchStudents();
            }
          });
        }, 2000); 
      },

    },
  };
  </script>

<style>
.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  width: 400px;
  max-width: 90%;
  max-height: 90%;
  overflow: auto;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
  