
{{ content() }}

<div>
  {{ form() }}
  <div>
    <label for="name">Your full name</label>
    <div class="input">
      {{ text_field("name", "size": "30", "class": "span6") }}
    </div>
  </div>

  <div>
    <label for="email">Your email</label>
    <div class="input">
      {{ text_field("email", "size": "30", "class": "span6") }}
    </div>
  </div>

  <div>
    <input type="submit" value="Update" class="btn btn-primary btn-large btn-info">
    {{ link_to('index/index', 'Cancel') }}
  </div>
  </form>
</div>