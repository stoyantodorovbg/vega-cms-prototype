import { mount } from '@vue/test-utils'
import JsonInput from "../../js/components/inputs/JsonInput";

describe('AddJsonInputKey Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(JsonInput);

    expect(wrapper).toMatchSnapshot();
  });
});
