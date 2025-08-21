<html lang="en">
@include('component.user-head')
<style>

.upgrade-plan-container{
    margin:130px 200px;
    width: 600px;
    color: #fff
}
    .form-group {
  margin-bottom: 15px;
  text-align: left;
}

.form-group label {
  display: block;
  margin-bottom: 6px;
  font-weight: 600;
  color: #d9dce0;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="file"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #d1d5db;
  border-radius: 8px;
  font-size: 0.95rem;
  color: #111827;
}

</style>
<body>
   @include('component.user-header')
    <div class="upgrade-plan-container">
      <h2 >Upgrade to Premium</h2>
      <p>Fill in your details and upload payment receipt to upgrade.</p>

      <form action="{{ route('premiumRequest') }}" method="POST" enctype="multipart/form-data">
         @csrf

         <!-- Hidden User ID -->
         <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

         <!-- Name -->
         <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" 
                   value="{{ auth()->user()->name }}" required>
         </div>

         <!-- Email -->
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" 
                   value="{{ auth()->user()->email }}" required>
         </div>

         <!-- E-Receipt -->
         <div class="form-group">
            <label for="e_receipt">Upload E-Receipt</label>
            <input type="file" name="e_receipt" id="e_receipt" required>
         </div>

         <button type="submit" style="color: mediumblue,margin:10px">Submit & Upgrade</button>
      </form>
   </div>
  

</body> 
</html>