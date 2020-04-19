import { mount } from '@vue/test-utils';
import JsonPresenter from "../../js/components/data/JsonPresenter";

describe('JsonPresenter Component', () => {
    test('should mount without crashing', () => {
      const wrapper = mount(JsonPresenter);
      expect(wrapper).toMatchSnapshot();
    });
});
