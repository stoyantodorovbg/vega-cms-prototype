import { mount } from '@vue/test-utils'
import RemoveJsonKey from "../../js/components/inputs/RemoveJsonKey";

describe('RemoveJsonKey Component', () => {
  test('should mount without crashing', () => {
    const wrapper = mount(RemoveJsonKey);

    expect(wrapper).toMatchSnapshot();
  });
});
