<template>

    <div class="login">
        <form class="log-in-form" action="POST">
            <h4 class="text-center">Log in below</h4>
            <div class="text-center">
                <label>Email
                    <input type="email" placeholder="somebody@example.com">
                </label>

            </div>

            <div class="text-center">
                 <label>Password
                     <input type="password" placeholder="Password">
                 </label>
                 <input type="checkbox"> Remember me</label>

            </div>
            <label>
                  <input type="checkbox" name="remember"> Remember Me
            </label>
            <p><input type="submit" class="button expanded" value="Log in"></input></p>
            <a class="text-center" href="#">
                Forgot Your Password?
            </a>
        </form>
        <add class="section"></add>
    </div>

</template>

<script>
export default {
  name: 'login'
}
</script>
<style lang="scss" scoped>
.log-in-form {
  border: 1px solid #cacaca;
  padding: 10px;
  border-radius: 0;

float:left;
  width: 70%
}

</style>