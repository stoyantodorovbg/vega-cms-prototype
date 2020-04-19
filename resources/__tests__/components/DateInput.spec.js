import { mount } from '@vue/test-utils'
import DateInput from "../../js/components/filters/DateInput";

describe('DateInput Component', () => {
  test.skip('should mount without crashing', () => {
    const wrapper = mount(DateInput);

    expect(wrapper).toMatchSnapshot();
  });
});

