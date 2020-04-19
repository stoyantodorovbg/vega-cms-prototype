import { mount } from "@vue/test-utils";
import TextInput from "../../js/components/filters/TextInput.vue";

describe('TextInput Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(TextInput);

    expect(wrapper).toMatchSnapshot();
  })
});
